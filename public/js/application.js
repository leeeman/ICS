var Utils = [], doc = $(document), win = $(win), body = $("body");
	var Stock = [], Order = [], SaleOrder = [], Supplier = [], Customer = [], Login = [], 
	Employe = [], Admin = [], Accounts = [], reqOptions = {};
	var typingTimer;                //timer identifier
	var doneTypingInterval = 1500;  //time in ms, 2.5 second for example
	PNotify.prototype.options.styling = "brighttheme";
	PNotify.stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 0, "firstpos2": 25};
	/*google.charts.load('current', {'packages':['corechart']});*/

	Utils.toMillions = function(number){
		splitAt = 3;
		//number = Math.round(number, 2);
		number = number.toString().split('').reverse().join("");
		n = number.split('.');

		number = n[n.length-1];
		number = number.match(new RegExp('.{1,'+splitAt+'}', 'g'));
		r = '';
		for(i=number.length-1; i>0; i--){
		    number[i] = number[i].split('').reverse().join("");
			r += number[i]+',';
		};
	    number[i] = number[i].split('').reverse().join("");
		r += number[i];
		if(n.length == 2)
			r+='.'+n[0];
		return r;
	};

	Utils.showDialog = function(title, content){
		$.Dialog({
	        overlay: true,
	        shadow: true,
	        flat: false,
	        icon: '',
	        title: 'Flat window',
			draggable: true,
            sysButtons: {
                // btnMin: true,
                // btnMax: true,
                btnClose: true
            },
        	content: '',
        	padding: 10,
        	onShow: function(_dialog){
            $.Dialog.title(title);
            $.Dialog.content(content);
            $.Metro.initInputs();
        }
    });
	}
	Utils.dataTable = function(selector, cols, callback){
		total = [], pageTotal = [];
		dt = $(selector).DataTable({
			"footerCallback": function(row, data, start, end, display) {
				var api = this.api(), data;
				// Remove the formatting to get integer data for summation
				var intVal = function(i) {
					return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ? i : 0;
				};

				i = 0;
				$.each(cols, function(index, col){
					// Total over all pages
					total[i] = api.column(col).data().reduce( function (a, b) { return intVal(a) + intVal(b); }, 0 );

					// Total over this page
					pageTotal[i] = api.column(col, { page: 'current'} ).data().reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
					i++;
				});//each

				i = 0;
				if(typeof callback === "undefined"){
					$.each(cols, function(index, col){
						$( api.column(col).footer() ).html(Utils.toMillions(Math.round(pageTotal[i])) +'('+ Math.round(total[i]) +')');
					});
				} else{
					callback(pageTotal, total);
				}
			}//footerCallback
		});//DataTable
		return dt;
	};

	Utils.startWait = function() {
	   $("#overlay").show();
	};

	Utils.stopWait = function() {
	   $("#overlay").hide();
	};

	Utils.loadPage = function(this_){
		Utils.startWait();
		link = this_.attr("data-link");
      $("#dashboard_content").load(link, function(){
      	 switch(link){
            case "stock/manage-stock": Stock.preparedatatable(); break;
            case "supplier/suppliers-main": Stock.preparedatatable(); break;
        }
      	Utils.stopWait();
      });
	}

	Utils.msgSuccess = function(msg){
		// $.notify(msg, "success");
		$(function(){
        	new PNotify({
            title: 'Success',
            text: msg,
            type: 'success',
            hide: true,
            delay: 2000,
            icon: false,
            buttons:{
               sticker: false,
               sticker_hover: false
            },
            animate_speed: "slow",
            animate:{
               animate: true,
               in_class: "rotateInDownLeft",
               out_class: "rotateOutUpRight",
            },
            addclass: "stack-bottomright",
            stack: PNotify.stack_bottomright
        	});
    	});
	}

	Utils.msgWarning = function(msg){
		// $.notify(msg, "success");
		$(function(){
        	new PNotify({
            title: 'Warning',
            text: msg,
            type: 'warning',
            hide: true,
            delay: 2000,
            icon: false,
            buttons:{
               sticker: false,
               sticker_hover: false
            },
            animate_speed: "slow",
            animate:{
               animate: true,
               in_class: "rotateInDownLeft",
               out_class: "rotateOutUpRight",
            },
            addclass: "stack-bottomright",
            stack: PNotify.stack_bottomright
        	});
    	});
	}

	Utils.msgError = function(msg){
		// $.notify(msg, "error");
		$(function(){
        	new PNotify({
            title: 'Error',
            text: msg,
            type: 'error',
            hide: true,
            delay: 2000,
            icon: false,
            buttons:{
               sticker: false,
               sticker_hover: false
            },
            animate_speed: "slow",
            animate:{
               animate: true,
               in_class: "rotateInDownLeft",
               out_class: "rotateOutUpRight",
            },
            addclass: "stack-bottomright",
            stack: PNotify.stack_bottomright
        	});
    	});
	}

	Utils.smartError = function (form_name, errors){
		$("#"+form_name+" :input").each(function(){
		  $(this).removeClass('has-error');
		});

		arr = [] ;
		er = $.parseJSON(errors);
		  
		elist = '<ul>';    

		$.each(er, function(key, value){                
		  $.each(value, function(k, v){            
		      if (arr.indexOf(v) == -1) {                
		          arr.push(v);                
		          elist += '<li>'+v+'</li>';
		      }
		  });
		  	// if(key.indexOf('.') == -1){
		  	// 	$("#"+key).addClass('has-error');
		  	// 	$("input[name="+key+"]").addClass('has-error');
		  	// }
		  	a = key.split('.');
	  		if(a.length > 1)
	  			key = a[0]+'['+a[1]+']';

	  		$("#"+key).addClass('has-error');
	  		$("input[name='"+key+"']").addClass('has-error');
		});

		elist +='</ul>';

		// $("#"+error_div).html(elist);    
		// $("#"+error_div).fadeIn(4000, "linear");
		// $("#"+error_div).show();
		Utils.msgError(elist);
	}
	
	Utils.post = function(url, success, input, error, extras){
		reqOptions = {};
		if(typeof extras === "undefined"){
			extras = {};
		}

		if(typeof extras['dataType'] === "undefined"){
			extras['dataType'] = 'json';
		}

		if(typeof extras['type'] === "undefined"){
			extras['type'] = 'post';
		}
		
		extras['url'] = url;
		extras['data'] = input;

		extras['success'] = function(data, status, xhr){
	      Utils.stopWait();
	      //console.log('response xhr', xhr);
	      if(typeof success === "undefined" || success == "default"){
	      	Utils.msgSuccess('Action performed Successfully');
	      } else{
	         success(data, status, xhr);
	      }
	   };

	   extras['error'] = function(data){
	      Utils.stopWait();
	      if(typeof error === "undefined" || error == "default"){
	         $.notify({
	           type: "error",
	           message: "Some error has occured!"
	         });
	      } else{
	         error(data);
	      }
	   };
	   reqOptions = extras;
      Utils.startWait();
      $.ajax(extras);
      return false;
   };

   Utils.get = function(url, success, input, error){
   	Utils.post(url, success, input, error, {type: 'get'});
   }
	Stock.showDetails = function(id){
		Utils.startWait();
		$("#dashboard_content").load('stock/edit-stock?id='+id, function(){
			Utils.stopWait();
		});
	}	

	Stock.preparedatatable= function (){

		$('#data_table').dataTable();
	}

	Stock.save = function(){
		var check_suplier=$("[name='supplier_id']").val();
		if(check_suplier!=0){
			Utils.post('stock/save-stock', 
				function(data){
					if(data.success){
						Utils.msgSuccess('New Stock added Successfully!');
						$("#dashboard_content").load('stock/manage-stock');
						Stock.preparedatatable();
					} else{
						Utils.smartError('stockForm', data.error);
					}
				}, 
				$('#stockForm').serialize()
			);
		}else{
			Utils.msgError("Please select the Supplier");
		}
	}

	Stock.edit = function(){
		var check_suplier=$("[name='supplier_id']").val();
		if(check_suplier!=0){
			Utils.post('stock/edit-stock', 
				function(data){
					if(data.success){
						Utils.msgSuccess('Stock updated Successfully!');
						$("#dashboard_content").load('stock/manage-stock');
						console.log('Data table is working');
						 setTimeout(function(){
 							 Stock.preparedatatable();
						}, 1000);
					} else{
						Utils.smartError('stockForm', data.error);
					}
				}, 
				$('#stockForm').serialize()
			);
		}else{
			Utils.msgError("Please select the Supplier");
		}
	}

	Stock.confirmDelete = function(id){
		str = '<button type="button" class="button danger" data-dismiss="modal" onClick="Stock.delete('+id+')">Yes</button>';
		str += '&nbsp;&nbsp;<button type="button" class="button default" onclick="$.Dialog.close()">No</button>';
		var content_h='<div class="modal-content">\
				<div class="modal-header">\
					<h4 id="super-modal-title">Confirm Delete</h4>\
				</div>\
<div class="modal-body" id="super-modal-body">\
				<p>Are you sure to delete selected stock?</p></div>\
				<div class="modal-footer" id="super-modal-footer">'+str+'</div></div>'

		Utils.showDialog('Stock Delete',content_h);
		
	}

	Stock.delete = function(id){
		Utils.post('stock/delete-stock', 
			function(data){
				if(data.success){
					$.Dialog.close();
					Utils.msgSuccess(data.msg);
					$("#dashboard_content").load('stock/manage-stock');
					Stock.preparedatatable();
				} else{
					Utils.msgError(data.error);
				}
			}, 
			{ id : id}
		);
	}

	

	//////////end of stock................

		Supplier.prepareMain = function(){
	   	Utils.stopWait();
	   	$('button[action=account_detail]').bind('click', function(){
	   		id = $(this).attr('data-id');
	   		Utils.startWait();
	   		$('#dashboard_content').load('supplier/account-detail?id='+id, function(){
	   			Utils.stopWait();
	   		});
	   	});

	   	$('button[action=edit]').bind('click', function(){
	   		id = $(this).attr('data-id');
	   		Utils.startWait();
	   		$('#dashboard_content').load('supplier/new-supplier?id='+id, function(){
	   			Utils.stopWait();
	   		});
	   	});
   	}

   	Supplier.save = function(){
		Utils.post('supplier/save-supplier', 
			function(data){
				if(data.success){
					Utils.msgSuccess('New Supplier added Successfully!');
					$("#dashboard_content").load('supplier/suppliers-main');
					Stock.preparedatatable();
				} else{
					Utils.smartError('supplierForm', data.error);
				}
			}, 
			$('#supplierForm').serialize()
		);
	}

	Supplier.showDetails = function(id){
		Utils.startWait();
		$("#dashboard_content").load('supplier/edit-supplier?id='+id, function(){
			Utils.stopWait();
		});
	}

	Supplier.showAccountDetails = function(id){
		Utils.startWait();
		$("#dashboard_content").load('supplier/account-detail?id='+id, function(){
			Utils.stopWait();
		});
	}

	//////end of supplier.......

	Customer.prepareMain = function(){
	   	Utils.stopWait();
	   	$('button[action=account_detail]').bind('click', function(){
	   		id = $(this).attr('data-id');
	   		Utils.startWait();
	   		$('#dashboard_content').load('customer/account-detail?id='+id, function(){
	   			Utils.stopWait();
	   		});
	   	});

	   	$('button[action=edit]').bind('click', function(){
	   		id = $(this).attr('data-id');
	   		Utils.startWait();
	   		$('#dashboard_content').load('customer/new-customer?id='+id, function(){
	   			Utils.stopWait();
	   		});
	   	});
   	}

   	Customer.save = function(){
		Utils.post('customer/save-customer', 
			function(data){
				if(data.success){
					Utils.msgSuccess('New Customer added Successfully!');
					$("#dashboard_content").load('customer/customers-main');
					console.log('data table is working');
					Stock.preparedatatable();
				} else{
					Utils.smartError('customerForm', data.error);
				}
			}, 
			$('#customerForm').serialize()
		);
	}

	Customer.showDetails = function(id){
		Utils.startWait();
		$("#dashboard_content").load('customer/edit-customer?id='+id, function(){
			Utils.stopWait();
		});
	}

	Customer.showAccountDetails = function(id){
		Utils.startWait();
		$("#dashboard_content").load('customer/account-detail?id='+id, function(){
			Utils.stopWait();
		});
	}

	/////////end of customer..........

	Employe.prepareMain = function(){
	   	Utils.stopWait();
	   
	   	$('button[action=edit]').bind('click', function(){
	   		id = $(this).attr('data-id');
	   		Utils.startWait();
	   		$('#dashboard_content').load('employe/new-employe?id='+id, function(){
	   			Utils.stopWait();
	   		});
	   	});
   	}

   	Employe.save = function(){
		Utils.post('employe/save-employe', 
			function(data){
				if(data.success){
					Utils.msgSuccess('New Customer added Successfully!');
					$("#dashboard_content").load('employe/employees-main');
					console.log('data table is working');
					Stock.preparedatatable();
				} else{
					Utils.smartError('employeForm', data.error);
				}
			}, 
			$('#employeForm').serialize()
		);
	}

	Employe.showDetails = function(id){
		Utils.startWait();
		$("#dashboard_content").load('employe/edit-employe?id='+id, function(){
			Utils.stopWait();
		});
	}

	
	/////end of customer............

$(function(){
	$(document).on('click',".nav",function(){
	link = $(this).attr("data-link");
      $("#dashboard_content").load(link, function(){
      // Utils.stopWait();

       switch(link){
            case "stock/manage-stock": Stock.preparedatatable(); break;
            case "supplier/suppliers-main": Stock.preparedatatable(); break;
            case "customer/customers-main": Stock.preparedatatable(); break;
        }
        });
      });
})
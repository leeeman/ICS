@include('partials.customerMenue')
<form id='customerForm'>
<input type="hidden" name="id" value="{{$data->id}}">
<div class="grid form-style">
    <div class="row">
        <div class="span12">
            <legend>Update Customer</legend>
        </div>
    </div>

    <div class="row">
        <div class="span6">
            <label>Customer Name</label>
            <div class="input-control text full-size">
                <input type="text" name="name" value="{{$data->name}}" placeholder="Customer Name">
            </div>
        </div>
    
        <div class="span6">
            <label>Email</label>
            <div class="input-control text full-size">
                <input type="email" name="email" value="{{$data->email}}" placeholder="test@gmail.com">
            </div>
     	</div>
    </div>
    
    <div class="row">
        <div class="span6">
                <label>Contact Info1</label>
                <div class="input-control text full-size">
                    <input type="text" name="contact_1" value="{{$data->contact_1}}" placeholder="Cell Number 1">
                </div>
        </div>
    
        <div class="span6">
                <label>Contact Infor2</label>
                <div class="input-control text full-size">
                    <input type="text" name="contact_2" value="{{$data->contact_2}}" placeholder="Cell Num 2">
                </div>
     	</div>
    </div>
    
    <div class="row">
        <div class="input-control select">
                <label>Customer Type</label>
                <select name="customer_type">
                    <option value="0">Select type</option>
                     @foreach($ct as $c_t)
                        @if($c_t->type==$data->customer_type)
                        <option value="{{$c_t->type}}" selected="selected">{{$c_t->label}}</option>
                        @else
                        <option value="{{$c_t->type}}">{{$c_t->label}}</option>
                        @endif
                      @endforeach     
                </select>
                
        </div>
    
        
    </div>

    <div class="row">
        <div class="input-control textarea">
        <label>Address</label>
          <textarea name="address">{{$data->address}}</textarea>
        </div>
       
       
    </div>
    
    <div class="form-actions">
    <button type="button" class="button default" onclick="Customer.save()" id="customerFormbtn">Save</button>
    <button type="button" class="button primary" data-link="customer/customers-main" onClick='Utils.loadPage($(this))'>Cancel</button>&nbsp;
        
    </div>
</div>
</form>
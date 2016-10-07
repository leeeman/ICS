@include('partials.suplierMenue')
<form id='supplierForm'>
<div class="grid form-style">
    <div class="row">
        <div class="span12">
            <legend>NEW Supplier</legend>
        </div>
    </div>

    <div class="row">
        <div class="span6">
            <label>Supplier Name</label>
            <div class="input-control text full-size">
                <input type="text" name="name" placeholder="Supplier Name">
            </div>
        </div>
    
        <div class="span6">
            <label>Email</label>
            <div class="input-control text full-size">
                <input type="email" name="email" placeholder="test@gmail.com">
            </div>
     	</div>
    </div>
    
    <div class="row">
        <div class="span6">
                <label>Contact Info1</label>
                <div class="input-control text full-size">
                    <input type="text" name="contact_1" placeholder="Cell Number 1">
                </div>
        </div>
    
        <div class="span6">
                <label>Contact Infor2</label>
                <div class="input-control text full-size">
                    <input type="text" name="contact_2" placeholder="Cell Num 2">
                </div>
     	</div>
    </div>
    
    <div class="row">
        <div class="input-control select">
                <label>Supplier Type</label>
                <select name="supplier_type">
                    <option value="0">Select Supplier</option>
                     @foreach($st as $supt)
                        <option value="{{$supt->id}}">{{$supt->label}}</option>
                      @endforeach     
                </select>
                
        </div>
    
        
    </div>

    <div class="row">
        <div class="input-control textarea">
          <textarea name="address"></textarea>
        </div>
       
       
    </div>
    
    <div class="form-actions">
    <button type="button" class="button primary" data-link="supplier/suppliers-main" onClick='Utils.loadPage($(this))'>Cancel</button>&nbsp;
        <button type="button" class="button defaul" onclick="Supplier.save()" id="supplierFormbtn">Save</button>
    </div>
</div>
</form>
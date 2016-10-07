@include('partials.suplierMenue')
<form id='supplierForm'>
<input type="hidden" name="id" value="{{$data->id}}">
<div class="grid form-style">
    <div class="row">
        <div class="span12">
            <legend>Update Supplier</legend>
        </div>
    </div>

    <div class="row">
        <div class="span6">
            <label>Supplier Name</label>
            <div class="input-control text full-size">
                <input type="text" name="name" value="{{$data->name}}" placeholder="Supplier Name">
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
                <label>Supplier Type</label>
                <select name="supplier_type">
                    <option value="0">Select Supplier</option>
                     @foreach($st as $supt)
                        @if($supt->type==$data->supplier_type)
                        <option value="{{$supt->type}}" selected="selected">{{$supt->label}}</option>
                        @else
                        <option value="{{$supt->type}}">{{$supt->label}}</option>
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
    <button type="button" class="button default" onclick="Supplier.save()" id="supplierFormbtn">Save</button>
    <button type="button" class="button primary" data-link="supplier/suppliers-main" onClick='Utils.loadPage($(this))'>Cancel</button>&nbsp;
        
    </div>
</div>
</form>
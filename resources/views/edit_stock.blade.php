@include('partials.stockMenue')
<form id='stockForm'>
<input type="hidden" name="p_id" value="{{$data->id}}">
<div class="grid form-style">
    <div class="row">
        <div class="span12">
            <legend>Update Stock</legend>
        </div>
    </div>

    <div class="row">
        <div class="span6">
            <label>Product Code</label>
            <div class="input-control text full-size">
                <input type="text" name="code" placeholder="Code#" value="{{$data->code}}">
            </div>
        </div>
    
        <div class="span6">
            <label>Type</label>
            <div class="input-control text full-size">
                <input type="text" name="generic" value="{{$data->generic}}" placeholder="Generic">
            </div>
     	</div>
    </div>
    
    <div class="row">
        <div class="span6">
                <label>Product Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="brand" placeholder="Product Name" value="{{$data->brand}}" >
                </div>
        </div>
    
        <div class="span6">
                
                <div class="input-control select">
                   <label>Supplier</label>
                    <select name="supplier_id">
                        <option value="0">Select Supplier</option>
                         @foreach($supplier as $supt)
                            @if($supt->id== $data->supplier_id)
                            <option value="{{$supt->id}}" selected="selected">{{$supt->name}}</option>
                            @else
                             <option value="{{$supt->id}}" >{{$supt->name}}</option>
                             @endif
                          @endforeach     
                    </select>
                
                </div>

     	</div>
    </div>
    
    <div class="row">
        <div class="span6">
                <label>Default Unit Price</label>
                <div class="input-control text full-size">
                    <input type="text" name="latest_unit_price" value="{{$data->latest_unit_price}}" placeholder="Unit Price">
                </div>
        </div>
    
        <div class="span6">
                <label>Alaram Quantity</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Buzz Alarm at Quantity" name="alarm_at" value="{{$data->alarm_at}}">
                </div>
     	</div>
    </div>

    <div class="row">
        <div class="span6">
                <label>Lead Time</label>
                <div class="input-control text full-size">
                    <input type="text" name="lead_time" value="{{$data->lead_time}}" placeholder="Time of Delivery">
                </div>
        </div>
    
        <div class="span6">
            <div class="input-control switch" data-role="input-control">
            @if($data->reusability=='false')
                <label class="inline-block" style="margin-right: 20px">
                    Reusability
                    <input type="checkbox" name="reusability" id="reusability" >
                    <span class="check"></span>
                </label>
             @else
             <label class="inline-block" style="margin-right: 20px">
                    Reusability
                    <input type="checkbox" checked="" name="reusability" id="reusability" >
                    <span class="check"></span>
                </label>
             @endif   
            </div>
     	</div>
    </div>
    
    <div class="form-actions">
    <button type="button" class="button primary" data-link="stock/manage-stock" onClick='Utils.loadPage($(this))'>Cancel</button>&nbsp;
        <button type="button" class="button primary" onclick="Stock.edit()" id="btnLogin">Update</button>
    </div>
</div>
</form>
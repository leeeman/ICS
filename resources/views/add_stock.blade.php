@include('partials.stockMenue')
<form id='stockForm'>
<div class="grid form-style">
    <div class="row">
        <div class="span12">
            <legend>New Stock</legend>
        </div>
    </div>

    <div class="row">
        <div class="span6">
            <label>Product Code</label>
            <div class="input-control text full-size">
                <input type="text" name="code" placeholder="Code#">
            </div>
        </div>
    
        <div class="span6">
            <label>Type</label>
            <div class="input-control text full-size">
                <input type="text" name="generic" placeholder="Generic">
            </div>
     	</div>
    </div>
    
    <div class="row">
        <div class="span6">
                <label>Product Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="brand" placeholder="Brand">
                </div>
        </div>
    
        <div class="span6">
                <label>Supplier</label>
                <div class="input-control text full-size">
                    <input type="text" name="supplier_id" placeholder="Supplier Name">
                </div>
     	</div>
    </div>
    
    <div class="row">
        <div class="span6">
                <label>Default Unit Price</label>
                <div class="input-control text full-size">
                    <input type="text" name="latest_unit_price" placeholder="Unit Price">
                </div>
        </div>
    
        <div class="span6">
                <label>Alaram Quantity</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Buzz Alarm at Quantity" name="alarm_at">
                </div>
     	</div>
    </div>

    <div class="row">
        <div class="span6">
                <label>Lead Time</label>
                <div class="input-control text full-size">
                    <input type="text" name="lead_time" placeholder="Time of Delivery">
                </div>
        </div>
    
        <div class="span6">
                <div class="input-control switch">
				    <label>Reusablity</label>
				        <input type="checkbox" name="reusablity" id="reusablity" />
				        <span class="check"></span>
				    </label>
				</div>
     	</div>
    </div>
    
    <div class="form-actions">
    <button type="button" class="button primary" data-link="stock/manage-stock" onClick='Utils.loadPage($(this))'>Cancel</button>&nbsp;
        <button type="button" class="button primary" onclick="Stock.save()" id="btnLogin">Save</button>
    </div>
</div>
</form>
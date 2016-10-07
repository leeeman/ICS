@include('partials.suplierMenue')
<form id='stockForm'>
<div class="grid form-style">
    <div class="row">
        <div class="span12">
            <legend>New Stock</legend>
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
                <input type="text" name="generic" placeholder="Generic">
            </div>
     	</div>
    </div>
    
    <div class="row">
        <div class="span6">
                <label>Contact Info1</label>
                <div class="input-control text full-size">
                    <input type="text" name="brand" placeholder="Brand">
                </div>
        </div>
    
        <div class="span6">
                <label>Contact Infor2</label>
                <div class="input-control text full-size">
                    <input type="text" name="supplier_id" placeholder="Supplier Name">
                </div>
     	</div>
    </div>
    
    <div class="row">
        <div class="input-control select">
                <label>Supplier Type</label>
                <select name="supplier_type">
                    <option value="0">Select Supplier</option>

                </select>
                
        </div>
    
        
    </div>

    <div class="row">
        <div class="input-control textarea">
          <textarea name="address">...</textarea>
        </div>
       
       
    </div>
    
    <div class="form-actions">
    <button type="button" class="button primary" data-link="stock/manage-stock" onClick='Utils.loadPage($(this))'>Cancel</button>&nbsp;
        <button type="button" class="button primary" onclick="Stock.save()" id="btnLogin">Save</button>
    </div>
</div>
</form>
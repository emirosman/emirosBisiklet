<?php

 echo $uye[0]->newsletter;

?>
<div class="form-group row">
    <label class="col-sm-3 form-control-label">Bülten Aboneliği</label>
    <div class="col-sm-6">
        <input id="option" class="checkbox-template" type="checkbox" <?=($uye[0]->newsletter==0)?"":"checked"?> name="newsletter"><label for="option">Kampanyalardan haberdar olmak istiyorum</label>
    </div>
</div>

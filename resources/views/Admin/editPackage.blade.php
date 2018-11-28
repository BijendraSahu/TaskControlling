<form>
    
        <div class="input-group col-sm-12">
            <div class="input-group-prepend">
                <label class="input-group-text" for="packageName1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></label>
            </div>
            <input type="text" class="form-control" id="packageName1" value="{{$Package->PackageName}}">
        </div>
    <br>
        <div class="input-group col-sm-12">
            <div class="input-group-prepend">
                <label class="input-group-text" for="packageduration1"><i class="fa fa-clock-o" aria-hidden="true"></i></label>
            </div>
            <input type="text" class="form-control mynumber" id="packageduration1" value="{{$Package->packageDuration}}">
        </div>
    <br>
        <div class="input-group col-sm-12">
            <div class="input-group-prepend">
                <label class="input-group-text" for="ammount1"><i class="fa fa-inr" aria-hidden="true"></i></label>
            </div>
            <input type="text" class="form-control mynumber" id="ammount1" value="{{$Package->PackageAmmount}}">
        </div>
    <input type="hidden" id="id" value="{{$Package->id}}">
</form>
<script type="text/javascript">
    $(".mynumber").keypress(function () {
        if (event.keyCode == 8) return true;

        if (!(event.keyCode >= 48 && event.keyCode <= 57)) return false;
    });
</script>
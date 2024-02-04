<div class="row card position-absolute"style="bottom:-126px;left:10px;width:100%">
    <div class="col-12">
       <div class="card-body p-0 searchvalue">
        <a href="javascript:void(0)" class="btn btn-sm text-primary mango" style="background-color: rgba(0,0, 0, 0.2);width:100%">Mango</a>
        <a href="javascript:void(0)" class="btn btn-sm text-primary orange" style="background-color: rgba(0,0, 0, 0.2);width:100%">Orange</a>
        <a href="javascript:void(0)" class="btn btn-sm text-primary guava" style="background-color: rgba(0,0, 0, 0.2);width:100%">Guave</a>
        <a href="javascript:void(0)" class="btn btn-sm text-primary strawberry" style="background-color: rgba(0,0, 0, 0.2);width:100%">Strawberry</a>
       </div>
    </div>
</div>
<script>
    $('.searchvalue a').click(function(){

        let value = $(this).attr("class").split(' ').pop();
        $('.searchString').val(value);
        // $('.searchDiv').hide();
    })
</script>
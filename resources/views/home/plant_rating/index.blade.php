@php
$ratingsArray = [];
foreach ($plant['ratings'] as $key => $value) {
$ratingsArray[]=$value['ratings'];
}
$ratingCounts = array_count_values($ratingsArray);
$ratingTimes = range(1, 5);

// Loop through and update counts
foreach ($ratingTimes as $key => $rating) {
$ratingTimes[$key+1] = isset($ratingCounts[$rating]) ? $ratingCounts[$rating] : 0;
}
@endphp
<div class="btn-sm btn-primary ratings_5 my-1" style="font-size: 10px; max-width:130px">
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <span style="color: white;padding-left:15px">{{$ratingTimes[5]}}+</span>
</div>
<div class="btn-sm btn-primary ratings_4 my-1" style="font-size: 10px; max-width:130px">
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star" style="color: grey"></i>
    <span style="color: white;padding-left:15px">{{$ratingTimes[4]}}+</span>
</div>
<div class="btn-sm btn-primary ratings_3 my-1" style="font-size: 10px; max-width:130px">
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star" style="color: grey"></i>
    <i class="fas fa-star" style="color: grey"></i>
    <span style="color: white;padding-left:15px">{{$ratingTimes[3]}}+</span>
</div>
<div class="btn-sm btn-primary ratings_2 my-1" style="font-size: 10px; max-width:130px">
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star" style="color: grey"></i>
    <i class="fas fa-star" style="color: grey"></i>
    <i class="fas fa-star" style="color: grey"></i>
    <span style="color: white;padding-left:15px">{{$ratingTimes[2]}}+</span>
</div>
<div class="btn-sm btn-primary ratings_2 my-1" style="font-size: 10px; max-width:130px">
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star" style="color: grey"></i>
    <i class="fas fa-star" style="color: grey"></i>
    <i class="fas fa-star" style="color: grey"></i>
    <i class="fas fa-star" style="color: grey"></i>
    <span style="color: white;padding-left:15px">{{$ratingTimes[1]}}+</span>
</div>
<input type="hidden" class="divdata" data-id="{{$plant['ratings'][0]['plant_id']}}">
<script>
    $(".changeratings div").click(function () {
        var selectedRating = $(this).attr("class").split(' ')[2];
        var plant_id = $('.divdata').data('id');
        $.ajax({
                url: "{{route('home.catchplantrating')}}",
                method: "POST",
                data: { plant_id: plant_id, rating: selectedRating },
                success: function (res) {
                    $('.viewratings').load();
                    toastr["success"](res.success, "Success");
                }, error: function (err) {
                    toastr["error"](err.error, "Cancelled");
                }
            })
    });
</script>
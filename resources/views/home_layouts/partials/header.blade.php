<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                        class="text-white">Dhaka, Bangladesh</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                        class="text-white">mdmeadulislam@gmail.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#privacy" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#t&c" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#refund" class="text-white"><small class="text-white ms-2">Sales and
                        Refunds</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{route('welcome')}}" class="logo d-flex align-items-center">
                <img class="d-lg-none d-sm-block" src="{{asset('backend2')}}/img/logo.png" alt="" width="30px"
                    height="30px">
                <h1 class="d-none d-lg-block text-primary pe-2">Nursery</h1>
            </a>
            <div class="mx-3 position-relative searchContainer">
                <div class="searchDiv" onclick="scrollToAllPlants()">
                    <input id="search" class="searchString" type="text" placeholder="Search">
                    <button type="submit" id="mainsearch" class=""><i class="fas fa-search"></i>
                    </button>
                </div>
                <div class="resultBox">
                </div>
                <script>
                    function scrollToAllPlants() {
                        $("html, body").animate({
                            scrollTop: $("#all_plants").offset().top
                        }, 500);
                    }
                </script>
            </div>
            <a href="javascript:void(0)"
                class="position-relative justify-content-center align-items-center mx-3 cartdetails"><span
                    style="font-size: 24px">🛒</span><span
                    class="position-absolute badge rounded-pill bg-secondary incarts"
                    style="top: -10px; right: -10px; height: 20px; min-width: 20px;">{{$cartItems}}</span></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    @auth
                    @if (Auth::user()->type === 'seller')
                    <a href="{{route('seller.dashboard')}}" class="nav-item nav-link">Dashboard</a>
                    @elseif(Auth::user()->type === 'buyer')
                    <a href="{{route('buyer.dashboard')}}" class="nav-item nav-link">Dashboard</a>
                    @endif
                    <a href="#" class="nav-item nav-link active">Home</a>
                    @endauth
                    @guest
                    <a href="{{route('welcome')}}" class="nav-item nav-link active">Home</a>
                    @endguest
                    <a href="#topTen" class="nav-item nav-link topTen" data-bs-toggle="tooltip"
                        data-bs-title="Top Plants" data-bs-placement="bottom">Top</a>
                    <a href="#all_plants" class="nav-item nav-link position-relative">All Plants<span
                            class="position-absolute badge rounded-pill bg-primary"
                            style="top: -5px; right: 5px; height: 20px; min-width: 20px;">{{$countPlant}}+</span></a>
                    <a href="#new_plants" class="nav-item nav-link position-relative">New Plants<span
                            class="position-absolute badge rounded-pill bg-danger"
                            style="top: -5px; right: 5px; height: 20px; min-width: 20px;">{{$newPlants->count()}}+</span></a>
                    <a href="#offers" class="nav-item nav-link">Offers</a>
                    <a href="#contact" class="nav-item nav-link">Contact</a>
                </div>
                <div class="d-flex mx-auto justify-content-center">
                    <div class="nav-item d-flex align-items-center justify-content center">
                        @auth
                        <a class="nav-link" href="{{route('logout')}}"
                            onclick="event.preventDefault(); document.getElementById('logout_form').submit();">Log
                            Out</a>
                        <form id="logout_form" action="{{route('logout')}}" method="POST">
                            @csrf
                        </form>
                        <a href="#" class="btn btn-secondary rounded-circle p-1"
                            title="{{Auth::user()->username}} "><img src="{{asset('')}}{{Auth::user()->photo}}" alt=""
                                width="50px" height="50px" style="border-radius: 50%"></a>
                        @endauth
                        @guest
                        <a class="nav-link" href="{{route('login')}}">Log In</a>
                        <a class="nav-link" href="{{route('register')}}">Register</a>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<script>
      var suggestions = [];
    document.addEventListener("DOMContentLoaded", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "{{ route('home.searchkey') }}", true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            suggestions = JSON.parse(xhr.responseText);
        }
    };
    xhr.send();
});
const searchInput = document.querySelector(".searchDiv");
const input = searchInput.querySelector(".searchString");
const resultBox = document.querySelector(".resultBox");
const li = resultBox.querySelectorAll('li');
input.onkeyup = (e)=>{
    let userData = e.target.value;
    let emptyArray = [];
    if(userData){
        emptyArray = suggestions.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase()); 
        });
        emptyArray = emptyArray.map((data)=>{
            return data = '<li>'+ data +'</li>';
        });
        resultBox.style.display='block'
        showSuggestions(emptyArray);
        let allList = resultBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            allList[i].setAttribute("onclick", "select(this)");
        }
    }else{
        resultBox.style.display='none';
    }
}
function showSuggestions(list){
    let listData;
    if(!list.length){
        userValue = input.value;
        listData = '<li>'+ userValue +'</li>';
    }else{
        listData = list.join('');
    }
    resultBox.innerHTML = listData;
}
function select(d){
    input.value = d.innerHTML;
    resultBox.style.display='none';
}
</script>
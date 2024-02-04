 <div class="container-fluid py-5 mb-5 hero-header" id="hero" name="hero">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h1 class="mb-3 text-secondary" style="font-size: 2rem">Biggest Gallary of Plants</h1>
                        <h2 class="mb-0 display-3 text-primary">Explore Beauty of Earth</h2>
                        <div class="position-relative mx-auto">
                         <p style="font-size: 1rem; font-weight:bold; color:green; font-style:italic">Buy a Plants or Display your favorite Plants. Spread the world Beauty.</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="{{asset('frontend')}}/img/cactus_plant.png"
                                        class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Cactus</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="{{asset('frontend')}}/img/flower_plant.png"
                                        class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Flower</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="{{asset('frontend')}}/img/bonsai_plant.png"
                                        class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Bonsai</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="{{asset('frontend')}}/img/indoor_plant.png"
                                        class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Indoor Plants</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
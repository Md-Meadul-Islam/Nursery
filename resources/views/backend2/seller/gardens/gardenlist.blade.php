<ul class="nav-item d-flex">
    @foreach ($gardensname as $gname)
    <li class="nav-link p-2">
      <a href="javascript:void(0)" class="btn btn-warning text-white">{{$gname->garden_name}}</a>
     </li>
    @endforeach                
    <li class="nav-link p-2">
      <a href="javascript:void(0)" class="btn btn-success addgardenbtn">➕</a>
    </li>
  </ul>
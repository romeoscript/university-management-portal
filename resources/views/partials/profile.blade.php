
<h2 class="title my-4">Profile</h2>

<p class="border-bottom"><b>Name:</b> <span>{{auth()->user()->surname}} {{auth()->user()->other_names}}</span></p>
<p class="border-bottom"><b>Reg number:</b> <span>{{auth()->user()->reg_no}}</span></p>
<p class="border-bottom"><b>Department:</b> <span>{{auth()->user()->department->name}}</span></p>
<p class="border-bottom"><b>Faculty:</b> <span>{{auth()->user()->faculty->name}}</span></p>
<p class="border-bottom"><b>Level:</b> <span>{{auth()->user()->level}}00 Level</span></p>
<p class="border-bottom"><b>State of Origin:</b> <span>{{auth()->user()->state_of_origin}}</span></p>
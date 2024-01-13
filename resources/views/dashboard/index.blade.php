@extends('layout')

@section('title', 'dashboard')

@section('content')
{{-- <!-- Hero Parts Start --> --}}
<section
id="hero"
class="flex p-4 relative justify-center border-b-4 border-[#A2A2A2] border-dashed mb-7"
>
<div id="Pic" class="flex justify-between my-5">
  <div class="flex md:mr-7 m-auto">
    <img
      src="{{asset ('images/food2.jpg')}}"
      alt="food2"
      class="flex w-[800px] h-auto"
    />
  </div>
  <div class="md:block hidden flex flex-wrap" >
    <img
      src="{{asset ('images/food3.jpg')}}"
      alt="food3"
      class="w-[350px] h-auto mb-7"
    />
    <img
      src="{{asset ('images/drink1.jpg')}}"
      alt="drink1"
      class="w-[350px] h-[250px]"
    />
  </div>
</div>
</section>
{{-- Hero End --}}  
  {{--Button --}}
  <section id="button" class=""><div class="w-full flex flex-wrap justify-center">
    <div
      class="flex w-[300px] h-[54px] bg-[#607E74] rounded-full text-xl text-white font-bold items-center justify-center font-Poppins"
    >
      Masak Apa Hari Ini ?
    </div></section>
    {{-- button end --}}
    {{-- content start --}}
    <section id="content" class="mt-7 flex justify-center mb-7">
        <div id="card-warp" class="flex flex-wrap justify-center mx-5">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow relative overflow-hidden md:mx-10 my-4">
                <a href="#" class="relative">
                    <img src="{{ asset('images/foodbg.jpg') }}" alt="foodbg" class="w-[400px] h-[250px]">
                    <div class="absolute inset-0 bg-black opacity-20"></div>
                </a>
                <div class="p-5 absolute bottom-0 left-0 w-full bg-gradient-to-b from-transparent to-yellow-200">
                    <a href="{{route('makanan.index')}}">
                        <h5 class="mb-2  block text-3xl font-bold tracking-tight text-white text-center">MAKANAN</h5>
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow relative overflow-hidden md:mx-10 my-4">
                <a href="#" class="relative">
                    <img src="{{ asset('images/drinkbg1.jpg') }}" alt="dringbg" class="w-[400px] h-[250px]">
                    <div class="absolute inset-0 bg-black opacity-20"></div>
                </a>
                <div class="p-5 absolute bottom-0 left-0 w-full bg-gradient-to-b from-transparent to-yellow-200">
                    <a href="{{route ('minuman.index')}}">
                        <h5 class="mb-2  block text-3xl font-bold tracking-tight text-white text-center">MINUMAN</h5>
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow relative overflow-hidden md:mx-10 my-4">
                <a href="#" class="relative">
                    <img src="{{ asset('images/snackbg.jpg') }}" alt="snackbg" class="w-[400px] h-[250px]">
                    <div class="absolute inset-0 bg-black opacity-20"></div>
                </a>
                <div class="p-5 absolute bottom-0 left-0 w-full bg-gradient-to-b from-transparent to-yellow-200">
                    <a href="{{route ('cemilan.index')}}">
                        <h5 class="mb-2  block text-3xl font-bold tracking-tight text-white text-center">CEMILAN</h5>
                    </a>
                </div>
            </div>
        </div>
        
    </section>
    {{-- content end --}}
@endsection
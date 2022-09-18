<x-guest-layout>
    <div class="flex justify-center items-center h-screen bg-gray-800">
        <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-xl">
          <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg" src="https://www.gse.harvard.edu/sites/default/files//content-images/1500x750-harvard-yard.jpg" alt="" />
          <div class="p-6 flex flex-col items-left">
            <div class="flex-shrink-0 flex items-center">
                <a>
                    <img src="https://img.icons8.com/fluency/48/undefined/university.png"/>
                </a>
                <p class="pl-3 font-serif text-lg text-gray-800 font-medium">Manila University</p>
            </div>
            <h1 class="text-blue-500 text-6xl font-black mb-5 font-serif mt-5">401</h1>
            <h5 class="text-gray-900 text-xl font-bold mb-5">Hold Up! Only authorized individuals are allowed here.</h5>
            <p class="text-black text-base mb-5">
                Make sure to login or register to get access to this page.
            </p>
            <a type="button" href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">Go back</a>
        </div>
        </div>
      </div>
</x-guest-layout>
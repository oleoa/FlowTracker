@if ($errors->any())

  <div class="bg-red-500 text-white px-4 py-2 rounded-md">

    <ul class="list-disc list-inside">

      @foreach ($errors->all() as $error)

        <li>{{$error}}</li>

      @endforeach

    </ul>

  </div>

@endif

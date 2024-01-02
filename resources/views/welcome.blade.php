<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TEST FSWD ARKATAMA - Farhaz</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen">
    <main class="bg-slate-800">
        <form class="min-h-screen flex flex-col justify-center items-center" action="/send" method="post">
            @csrf
            <div class="py-5 text-white text-center">
                <p class="text-2xl font-bold">Input this form with format:</p>
                <p class="border rounded-lg border-white my-2 py-1">NAMA[spasi]USIA[spasi]KOTA</p>
                <p>Example: CUT MINI 28 BANDA ACEH</p>
            </div>

            <input
                class="rounded-lg bg-[#F1F8FE] border-[#1B232E] text-[#1B232E] focus:ring-[#1B232E] focus:border-[#1B232E] text-sm p-2.5 w-1/3 @error('input1') invalid:border-[#FF5A8A] @enderror"
                type="text" id="input1" name="input1" value="{{ old('input1') }}" placeholder="Fill this form"
                required oninvalid="this.setCustomValidity('All field is required!')" oninput="setCustomValidity('')">
            @error('input1')
                <p class="text-[#FF5A8A] mt-2 text-sm font-medium">
                    {{ $message }}
                </p>
            @enderror
            @if (session()->has('success'))
                <p class="mt-5 text-green-500">{{ session('success') }}</p>
            @endif
            <button type="submit"
                class="text-[#1B232E] bg-[#36BB6A] hover:bg-[#36BB6A]/75 focus:ring-4 focus:outline-none focus:ring-white font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center my-5"
                onclick="return confirm('Is the data entered correct?')">Send</button>
        </form>
    </main>
</body>

</html>

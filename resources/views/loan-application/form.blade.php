<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for a Loan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen p-4 sm:p-6">
    
    <div class="absolute top-4 right-4 z-10">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-slate-700 rounded-lg hover:bg-slate-600 transition-colors">Sign Out</button>
        </form>
    </div>

    <div class="bg-slate-800 text-white p-8 rounded-3xl shadow-2xl w-full max-w-lg border border-slate-700">
        <h1 class="text-4xl font-extrabold mb-2 text-center text-white">Loan Application</h1>
        <p class="text-slate-400 mb-8 text-center">Fill out the form below to apply for a loan.</p>

        @if (session('success'))
            <div class="bg-green-700 bg-opacity-30 border border-green-600 text-green-300 p-4 rounded-xl mb-6" role="alert">
                <p class="font-bold">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-700 bg-opacity-30 border border-red-600 text-red-300 p-4 rounded-xl mb-6" role="alert">
                <p class="font-bold">Errors:</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('submit.loan') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="amount" class="block text-sm font-semibold text-slate-300 mb-2">Loan Amount</label>
                <input type="number" name="amount" id="amount" class="w-full px-4 py-2 border border-slate-700 rounded-lg bg-slate-900 text-white placeholder-slate-400 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" min="1000" placeholder="e.g., 1000000" value="{{ old('amount') }}">
            </div>

            <div>
                <label for="tenure" class="block text-sm font-semibold text-slate-300 mb-2">Loan Tenure (Months)</label>
                <input type="number" name="tenure" id="tenure" class="w-full px-4 py-2 border border-slate-700 rounded-lg bg-slate-900 text-white placeholder-slate-400 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" min="1" placeholder="e.g., 12" value="{{ old('tenure') }}">
            </div>

            <div>
                <label for="purpose" class="block text-sm font-semibold text-slate-300 mb-2">Loan Purpose</label>
                <input type="text" name="purpose" id="purpose" class="w-full px-4 py-2 border border-slate-700 rounded-lg bg-slate-900 text-white placeholder-slate-400 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" placeholder="e.g., Home renovation" value="{{ old('purpose') }}">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                Submit Application
            </button>
        </form>

        <a href="{{ route('borrower.loans') }}" class="mt-4 block w-full text-center text-sm font-medium text-slate-400 hover:text-white transition-colors">
            See my application loan
        </a>
    </div>

</body>
</html>

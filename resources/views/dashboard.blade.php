<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        /* CSS untuk tombol dan label */
        .label-text {
            color: white;
        }

        /* Gaya untuk label ketika di dalam input */
        .input-label-text {
            color: black;
        }

        .login-button {
            background-color: #808080;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #696969;
        }

        .login-button:focus {
            outline: none;
            background-color: #696969;
        }

        /* Gaya untuk input */
        input[type="text"],
        input[type="password"] {
            color: black;
        }

        /* Gaya untuk bagian-bagian tertentu */
        .section {
            margin-bottom: 20px;
        }

        .section-header {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .section-content {
            margin-left: 20px;
        }

        .button-group {
            margin-top: 10px;
        }

        .loading-spinner {
            display: none;
            margin-top: 20px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Tampilkan pesan kesalahan jika diperlukan -->
                    @if(session('error'))
                        <p class="text-red-500 text-white">{{ session('error') }}</p>
                    @endif

                    <!-- Tampilkan pesan sukses jika ada -->
                    @if(session('success'))
                        <p class="text-green-500 text-white">{{ session('success') }}</p>
                    @endif

                    <!-- Form untuk mengisikan Instagram username dan password -->
                    <form method="POST" action="{{ route('instagram.login_client') }}">
                        @csrf

                        <div class="section">
                            <div class="section-header">Login Information</div>
                             @if ($username_akun_client !== null)
                                <p>Username: {{ $username_akun_client }}</p>
                            @endif
                            @if ($username_akun_client === null || $username_akun_client == "login gagal")
                            <div class="section-content">
                                <div class="mb-4">
                                    <label for="instagram_username" class="block text-sm font-semibold mb-1 label-text">Instagram Username</label>
                                    <input id="instagram_username_1" type="text" name="instagram_username" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">  
                                </div>

                                <div class="mb-4">
                                    <label for="instagram_password" class="block text-sm font-semibold mb-1 label-text">Instagram Password</label>
                                    <input id="instagram_password_1" type="password" name="instagram_password" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
                                </div>

                                <button type="submit" class="login-button">Login</button>
                            </div>
                              @endif
                        </div>  
                    </form>

                    <form method="POST" action="{{ route('instagram.login') }}">
                        @csrf

                        <div class="section">
                        <div class="section-header">Login Information Dump akun</div>
                        @if ($username_akun_dump !== null)
                            <p>Username: {{ $username_akun_dump }}</p>
                        @endif
                        @if ($username_akun_dump === null || $username_akun_dump == "login gagal")
                        <div class="section-content">
                            <div class="mb-4">
                                <label for="instagram_username" class="block text-sm font-semibold mb-1 label-text">Instagram Username</label>
                                <input id="instagram_username" type="text" name="instagram_username" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
                            </div>

                            <div class="mb-4">
                                <label for="instagram_password" class="block text-sm font-semibold mb-1 label-text">Instagram Password</label>
                                <input id="instagram_password" type="password" name="instagram_password" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
                            </div>

                            <button type="submit" class="login-button">Login</button>
                        </div>
                        @endif
                    </div>
                    </form>
                    <div class="section">
                            <div class="section-header">Auto Story Viewer</div>
                            <div class="section-content">
                                <div id="input-container">
                                    <h2 class="text-lg font-semibold mb-2">Input Target</h2>
                                    <form id="target-form">
                                        <div class="form-input">
                                            <label for="targets" class="block text-sm font-semibold mb-1 label-text">Target 1</label>
                                            <input type="text" id="targets" name="targets" placeholder="Masukkan target..." value="{{ $target_data ?? '' }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                                        </div>
                                        <div class="form-input">
                                            <label for="target2" class="block text-sm font-semibold mb-1 label-text">Target 2</label>
                                            <input type="text" id="target2" name="target2" placeholder="Masukkan target kedua..." value="{{ $target2_data ?? '' }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
                                        </div>
                                        <div class="form-input">
                                            <label for="target3" class="block text-sm font-semibold mb-1 label-text">Target 3</label>
                                            <input type="text" id="target3" name="target3" placeholder="Masukkan target ketiga..." value="{{ $target3_data ?? '' }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
                                        </div>
                                        <div class="button-group">
                                            <button type="button" onclick="submitTargets()" class="login-button">Submit</button>
                                        </div>
                                        <p id="submit-message"></p>
                                    </form>
                                </div>

                                <div class="button-group">
                                    <button onclick="startAutoStory()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Mulai</button>
                                    <button onclick="stopAutoStory()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">Berhenti</button>
                                </div>

                                <div class="loading-spinner" id="loading-spinner">Loading...</div>
                                <style>
                                    #notification-label {
                                        margin-top: 20px; /* Atur jarak ke atas sebesar 20px */
                                    }
                                </style>
                                <div id="notification-label" class="notification-label hidden bg-red-500 text-white px-4 py-2 rounded hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">
                                    <p id="log-output"></p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var logOutput = document.getElementById('log-output');

        // Log output value
        var outputValue = "Value yang akan dijalankan";

        // Set nilai log-output
        logOutput.innerHTML = outputValue;

        // Cek jika log-output memiliki nilai
        if (logOutput.innerHTML !== "") {
            // Hapus kelas 'hidden' dari notification-label untuk menampilkannya
            document.getElementById('notification-label').classList.remove('hidden');
        }
        let previousLog = '';
        function getLog(){
            fetch('/status-output', {
            method: 'get',
        })
        .then(response => {
            if (!response.ok) {
                console.log(response)
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            hideLoadingSpinner(); // Sembunyikan loading spinner
            const currentLog = data.log; // Simpan log saat ini

            // Tambahkan log baru hanya jika berbeda dengan log sebelumnya
            if (currentLog !== previousLog) {
                document.getElementById('log-output').innerHTML += currentLog + '<br>';
                previousLog = currentLog; // Perbarui log sebelumnya
            }
        });
        }
        function submitTargets() {
            var targetsInput = document.getElementById('targets').value;
            var targetsInput2 = document.getElementById('target2').value;
            var targetsInput3 = document.getElementById('target3').value;
            
            // Kirim permintaan POST ke server untuk menyimpan target
            showLoadingSpinner(); // Tampilkan loading spinner
            fetch('/process-targets', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ targets: targetsInput, targets2: targetsInput2, targets3: targetsInput3 })
            })
            .then(response => response.json())
            .then(data => {
                hideLoadingSpinner(); // Sembunyikan loading spinner
                document.getElementById('submit-message').innerHTML = data.message;

                if (data.status === 'success') {
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }
            });
        }

        function startAutoStory() {
            showLoadingSpinner();
            fetch('/auto-story-viewer-start', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
            })
            .then(response => response.json())
            .then(data => {
                hideLoadingSpinner();
                document.getElementById('submit-message').innerHTML = data.message;
            });
        }

        function stopAutoStory() {
            showLoadingSpinner();
            fetch('/auto-story-viewer-stop', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
            })
            .then(response => response.json())
            .then(data => {
                hideLoadingSpinner();
                document.getElementById('submit-message').innerHTML = data.message;
            });
        }

        function autoStoryViewer() {
            fetch('/auto-story-viewer')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('output-container').innerHTML = JSON.stringify(data);
                });
        }

        function showLoadingSpinner() {
            document.getElementById('loading-spinner').style.display = 'block';
        }

        function hideLoadingSpinner() {
            document.getElementById('loading-spinner').style.display = 'none';
        }

        window.onload = autoStoryViewer;
        window.onload = function() {
        setInterval(getLog, 5000); // Panggil getLog() setiap 5 detik
        };
    </script>
</x-app-layout>

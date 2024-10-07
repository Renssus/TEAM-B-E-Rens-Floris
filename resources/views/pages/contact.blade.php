<x-layouts.app>

    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100" style="background-color: #e9ecef;">
        <div class="card p-4" style="width: 400px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <h1 class="mb-4 text-center">Contact</h1>
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Naam:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Bericht:</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Verstuur</button>
            </form>
        </div>
    </div>

</x-layouts.app>
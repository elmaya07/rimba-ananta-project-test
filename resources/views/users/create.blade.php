@extends('layouts.app')

@section('head')
<style>
    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #4f46e5;
    }
    .box-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .error-message {
        color: #ef4444;
        font-size: 13px;
        margin-top: 4px;
        margin-bottom: 10px;
    }
    input.error {
        border-color: #ef4444;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="box-title">
        <a href="{{ url('users') }}" class="action-btn delete-btn">Back</a>
        <h2>New User</h2>
        <span></span>
    </div>
    <form id="user-form">
        @csrf

        <label for="name">Name</label>
        <input type="text" id="name" name="name">
        <div class="error-message" id="error-name"></div>

        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <div class="error-message" id="error-email"></div>

        <label for="age">Age</label>
        <input type="number" id="age" name="age" min="1">
        <div class="error-message" id="error-age"></div>

        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <div class="error-message" id="error-password"></div>

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <button type="submit" class="submit-btn">Submit</button>
        <!-- <button type="button" class="submit-btn">Batal</button> -->
    </form>
</div>

<script>
document.getElementById('user-form').addEventListener('submit', async function(event) {
    event.preventDefault();

    // console.log(event)

    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
    document.querySelectorAll('input').forEach(el => el.classList.remove('error'));

    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    try {
        const response = await fetch('api/users', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        // console.log(response,'response')
        if (response.ok) {         
            window.location.href = 'users';
        } else if (response.status === 422) {
            const result = await response.json();
          
            const errors = result.errors;
            console.log(errors,'errors')

            Object.keys(errors).forEach(field => {
                console.log(field,'field')
                document.getElementById(`error-${field}`).textContent = errors[field][0];
                document.getElementById(field).classList.add('error');
            });
        } else {
            alert('Ada yang salah. Silakan coba lagi.');
        }
    } catch (error) {
        console.error(error);
        alert('Jaringan error. Silakan coba lagi.');
    }
});
</script>
@endsection

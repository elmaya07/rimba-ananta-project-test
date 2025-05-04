@extends('layouts.app')
@section('head')
<style>
       
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }
        th, td {
            padding: 14px 16px;
            text-align: left;
        }
        th {
            background-color: #4f46e5;
            color: white;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        tr:hover {
            background-color: #eef2ff;
        }
        td {
            color: #374151;
        } 
        @media (max-width: 700px) {
            th, td {
                padding: 12px 14px;
            }
        }
        .delete-form {
            display: inline;
        }
        .delete-btn {
            border: none;
            background: none;
            cursor: pointer;
            padding: 0;
            color: #ef4444;
        }
        .alert{
            display: flex;
            justify-content: center;
            align-items: center; 
            color: #065f46;
        }
        .alert {
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0.375rem;
        }
        .alert-success {
            background-color: #dcfce7;
            color: #166534;
        }
        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
        }
        #notification {
            position: fixed;
            top: 1rem;
            right: 1rem;
            padding: 1rem;
            border-radius: 0.375rem;
            display: none;
            z-index: 50;
        }
    
    </style> 
@endsection
@section('content')
@if(session('success'))
        <div class="alert alert-success ">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="header">
            <h2>User List</h2>
            <a href="{{ route('users.create') }}" class="add-btn">+ Add User</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th> 
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr id="user-row-{{ $user->id }}">
                        <td>{{ $user->name }}</td>
                        <td class="password">{{ $user->email }}</td>
                        <td>{{ $user->age }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="action-btn edit-btn">Edit</a>
                            <button onclick="deleteUser({{ $user->id }})" class="action-btn delete-btn">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<div id="notification"></div>

<script>
async function deleteUser(userId) {
    if (!confirm('Are you sure you want to delete this user?')) {
        return;
    }

    try {
        const response = await fetch(`api/users/${userId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            // Remove the row from the table
            document.getElementById(`user-row-${userId}`).remove();
            showNotification('User deleted successfully', 'success');
        } else {
            const data = await response.json();
            showNotification(data.message || 'Error deleting user', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Network error occurred', 'error');
    }
}

function showNotification(message, type) {
    const notification = document.getElementById('notification');
    notification.textContent = message;
    notification.style.display = 'block';
    notification.className = type === 'success' ? 'alert-success' : 'alert-error';

    setTimeout(() => {
        notification.style.display = 'none';
    }, 3000);
}
</script>
@endsection

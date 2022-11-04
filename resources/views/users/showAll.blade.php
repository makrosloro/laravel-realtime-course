@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        <ul id="users-list">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        window.axios.get('/api/users')
            .then((response)=> {
                const usersElements = document.getElementById('users-list');

                let users = response.data;

                users.forEach((user, index) => {

                    let element = document.createElement('li');

                    element.setAttribute('id', user.id);
                    element.innerText = user.name;

                    usersElements.appendChild(element);
                });
            });
    </script>

    <script type="module">
        Echo.channel('users')
            .listen('UserCreated', (e) => {
                const usersElements = document.getElementById('users-list');
                let element = document.createElement('li');

                element.setAttribute('id', e.user.id);
                element.innerText = e.user.name;

                usersElements.appendChild(element);
            })
            .listen('UserUpdated', (e) => {
                let element = document.getElementById(e.user.id);
                element.innerText = e.user.name;
            })
            .listen('UserDeleted', (e) => {
                let element = document.getElementById(e.user.id);
                element.parentNode.removeChild(element);
            });
    </script>
@endpush



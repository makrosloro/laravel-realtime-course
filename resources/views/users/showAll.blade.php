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
            })
    </script>
@endpush



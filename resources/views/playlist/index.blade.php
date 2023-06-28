@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row offset-top">
            <div class="col-12">
                <a class="btn btn-outline-success float-right" href="{{ route('playlists.create') }}">Create playlist<span class="sr-only">(current)</span></a>
            </div>
        </div>
        <hr style="background-color:white;"/>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Infomation</th>
                        <th scope="col">Add songs</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody style="color:white;">

                    @forelse($playlists as $playlist)
                        <tr>
                            <th scope="row">{{++$counter}}</th>
                            <td>{{$playlist->playlist_name}}</td>
                            <td>{{$playlist->playlist_info}}</td>
                            <td><a class="btn btn-outline-success btn-sm" href="/playlists/{{$playlist->id}}">Click here</a></td>
                            <td><a class="btn btn-outline-success btn-sm" href="/playlists/delete/{{$playlist->id}}">Delete</a></td>
                        <!-- <a class="no-playlist-decoration" href="/playlists/{{$playlist->id}}">Click here</a> -->
                        </tr>
                    @empty

                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

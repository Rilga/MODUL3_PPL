@extends('layouts.app')
@section('content')

<div style="margin-top:20px;" class="poppins">
    <div class="" style="margin: 1rem; ">
        <p> 
            <a href="/notes">Notes</a> / 
            <a href="/note/{{ $note_data->id }}">{{ $note_data->judul }}</a>
        
        </p>
        
    </div>
    <div class="div-note">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div >
                    <p class="bold font-lg">{{ $note_data->judul }}</p>
                </div>
                <div style="display: flex; gap: 8px; flex-direction: row; align-items:center">
                    <p style="font-size: 12px">{{ $note_data->updated_at->diffForHumans()}}</p>
                    <div style="display: flex; align-items: center; gap: 4px; ">
                        {{-- <i class="material-icons" style="color: rgb(255 203 0 1);">mode_edit</i> --}}
                        {{-- <i class="material-icons" style="color: rgb(242, 41, 41);">delete_forever</i> --}}
                        <a type="submit" href="/edit-note-page/{{$note_data->id}}" id="{{$note_data->id}}" style="width: 60px; text-align:center; border-radius: 0.375rem; background-color: rgb(255 203 0); padding: 6px; color:white; font-size: 12px; font-weight:600;">
                            Edit
                        </a>
                        <form class="" action="/delete-note/{{ $note_data->id }}" method="POST" style="margin: 0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="delete-{{$note_data->id}}" style="width: 60px; text-align:center; border-radius: 0.375rem; background-color: rgb(242, 41, 41); padding: 6px; color:white; font-size: 12px; font-weight:600;">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
                        
            <p class="semi-bold"> Author: {{ $note_data->penulis->name }}</p>
            <p style="text-align: justify;">{{ $note_data->isi }}</p>
    </div>
</div>
@endsection
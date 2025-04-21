@extends('layouts.app')
@section('content')

<div style="margin-top:20px;" class="poppins">
    <div class="" style="margin: 1rem;display: flex;flex-direction: column;gap: 0.5rem;">
        <a href="/create-note" class="semi-bold" style="border-radius: 0.375rem; background-color: rgb(94, 202, 237);padding: 10px;color:white;font-width: 600;width: 120px;text-align: center;">
            Create Note
        </a>
        @if (session('success'))
            <div id="success-notif" class="notification success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div id="error-notif" class="notification error">
                {{ session('error') }}
            </div>
        @endif
    </div>
    @foreach ($notes_data as $item)
        <div class="div-note">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div >
                        {{-- <p class="bold font-lg">{{ $item->judul }}</p> --}}
                        <a type="submit" href="{{ route('detail-note', $item->id )}}" dusk="detail-{{$item->id}}" class="bold font-lg id="{{$item->id}}">
                            {{ $item->judul }}
                        </a>
                    </div>
                    <div style="display: flex; gap: 8px; flex-direction: row; align-items:center">
                        <p style="font-size: 12px">{{ $item->updated_at->diffForHumans()}}</p>
                        <div style="display: flex; align-items: center; gap: 4px; ">
                            {{-- <i class="material-icons" style="color: rgb(255 203 0 1);">mode_edit</i> --}}
                            {{-- <i class="material-icons" style="color: rgb(242, 41, 41);">delete_forever</i> --}}
                            <a type="submit" href="/edit-note-page/{{$item->id}}" dusk="edit-{{$item->id}}" style="width: 60px; text-align:center; border-radius: 0.375rem; background-color: rgb(255 203 0); padding: 6px; color:white; font-size: 12px; font-weight:600;">
                                Edit
                            </a>
                            <form class="" action="/delete-note/{{ $item->id }}" method="POST" style="margin: 0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="delete-{{$item->id}}" style="width: 60px; text-align:center; border-radius: 0.375rem; background-color: rgb(242, 41, 41); padding: 6px; color:white; font-size: 12px; font-weight:600;">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div style="display: flex; flex-direction: column;">
                    <a href="/profile" class="semi-bold"> Author: {{ $item->penulis->name }}</a>
                    <a href="{{ route('detail-note', $item->id )}}" style="text-align: justify;">
                        {{ $item->isi }}
                    </a>
                </div>
        </div>
    @endforeach
</div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        function hideNotification(element) {
            if (element) {
                setTimeout(() => {
                    element.style.opacity = '0';
                    setTimeout(() => {
                        element.style.display = 'none';
                    }, 500);
                }, 2500); // Mulai fade out setelah 4.5 detik
            }
        }

        hideNotification(document.getElementById('success-notif'));
        hideNotification(document.getElementById('error-notif'));
    });
</script>
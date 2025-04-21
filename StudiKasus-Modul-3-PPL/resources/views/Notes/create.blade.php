@extends('layouts.app')
@section('content')
<div style="margin-top:20px;" class="poppins">
    <p> 
        <a href="/notes">Notes</a> / 
        <a href="/create-notes">Create Note</a>
    </p>
    <div class="container-form">
        <!-- Notifikasi -->
        @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 12px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #a7f3d0;">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div style="background: #fee2e2; color: #b91c1c; padding: 12px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #fca5a5;">
            {{ session('error') }}
        </div>
        @endif

        <div class="form-note">
            <form method="POST" action="{{route('note-submit')}}">
                @csrf
                    <div class="" style="margin-bottom: 1.25rem;">
                        <label style="display: block; 
                                    font-size: 0.875rem;
                                    line-height: 1.25rem; 
                                    font-weight: 500; 
                                    color: #374151;">
                                    Title
                        </label>
                        <input type="text" name="title" class="" value="{{ old('title') }}" style="border-radius: 0.375rem; border-color: #D1D5DB; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); width:100%;" 
                        @if($errors->has('title')) style="border-color: #ef4444;" @endif/>

                        @error('title')
                            <p style="color: #ef4444; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="" style="margin-bottom: 1.25rem;">
                        <label style="display: block; 
                                    font-size: 0.875rem;
                                    line-height: 1.25rem; 
                                    font-weight: 500; 
                                    color: #374151;">
                                    Description
                        </label>
                        {{-- <input type="text" name="title" class="" style= "border-radius: 0.375rem; border-color: #D1D5DB; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); width:100%;"/> --}}
                        <textarea name="description" class="" style="border-radius: 0.375rem;
                            border: 1px solid #D1D5DB;
                            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
                            width: 100%;
                            padding: 0.5rem;
                            font-family: inherit;
                            text-align: left;
                            white-space: pre-wrap;
                            @if($errors->has('description')) border-color: #ef4444; @endif">{{ old('description') }}</textarea>

                        @error('description')
                            <p style="color: #ef4444; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div style="display: flex; justify-content: flex-end;">
                        <button type="submit" class="btn-submit-note" style="">Create</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
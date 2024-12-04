@extends('utilities.main')       
@section('content')

    <div id="send-mail-page" class="border-4 border-indigo-500 bg-[#f9fafb]">
        <div class="main-container border-4 border-indigo-500">
            <div id="editor" class="bg-[#fafbfc]">
                <h2 class="text-center">Send Mail</h2>
                <form method="POST" action="{{ route('fetchMail.data') }}" class="emailEditor">
                    @csrf
                    <textarea id="emailEditor" name="content" placeholder="Write Email Body Here!"></textarea>
                    <button type="submit">Submit</button>
                    
                </form>
                <a class="btn btn-primary mx-auto" href="{{ route('sendEmail.send') }}">SEND</a>
            </div>
		</div>
    </div>

@endsection
<form wire:submit.prevent="submit">

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="name">Full Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name"
                    id="name" placeholder="Name">
                <x-invalid-feedback key="name" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email"
                    id="email" placeholder="Email">
                <x-invalid-feedback key="email" />
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label" for="subject">Subject</label>
                <input type="text" class="form-control @error('subject') is-invalid @enderror" wire:model="subject"
                    id="subject" placeholder="Subject">
                <x-invalid-feedback key="subject" />
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label" for="#">Message</label>
                <textarea wire:model="message" class="form-control @error('message') is-invalid @enderror" id="message" cols="30"
                    rows="4" placeholder="Message"></textarea>
                <x-invalid-feedback key="message" />
            </div>
        </div>
        <div class="col-md-12 my-2">
            @if ($sent)
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Form Submitted</h4>
                    <p>Your message has been sent. We will get back to you as soon as possible.</p>
                </div>
            @else
                <div class="mb-3">
                    <input type="submit" value="Send Message" class="btn btn-primary">
                </div>
            @endif
        </div>
    </div>
</form>

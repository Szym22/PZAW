<<!-- resources/views/components/quote.blade.php -->

<figure {{ $attributes->merge(['class' => 'my-figure-class']) }}>
    <img src="{{ $image }}" alt="{{ $alt }}" />
    <div>
        <blockquote>{{ $quote }}</blockquote>
        <figcaption>
            <p>{{ $authorName }}</p>
            <p>{{ $authorPosition }}</p>
        </figcaption>
    </div>
</figure>



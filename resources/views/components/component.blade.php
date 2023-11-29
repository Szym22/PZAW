@props([
    'title',
    'content',
    'author',
])

<ul>
    <li>
        {{ $title }}
    </li>
    <li>
        {{ $author }}
    </li>
    <li>
        {{ $content }}
    </li>
</ul>
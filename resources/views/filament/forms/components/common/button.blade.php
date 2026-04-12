<a
    href="{{ $link }}"
    class="hero-button {{ $is_primary ? 'hero-button-primary' : 'hero-button-secondary' }}"
    style="
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.625rem 1.25rem;
        border-radius: 0.5rem;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.875rem;
        transition: all 0.2s ease;
        {{ $is_primary
            ? 'background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; box-shadow: 0 2px 4px rgba(102, 126, 234, 0.25);'
            : 'background: #f3f4f6; color: #374151; border: 1px solid #d1d5db;'
        }}
    "
    onmouseover="{{
        $is_primary
            ? "this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 6px rgba(102, 126, 234, 0.35)';"
            : "this.style.background='#e5e7eb'; this.style.borderColor='#9ca3af';"
    }}"
    onmouseout="{{
        $is_primary
            ? "this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 4px rgba(102, 126, 234, 0.25)';"
            : "this.style.background='#f3f4f6'; this.style.borderColor='#d1d5db';"
    }}"
>
    {{ $content }}
</a>
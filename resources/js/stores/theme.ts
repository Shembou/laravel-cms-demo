import { writable } from 'svelte/store';
type Theme = 'dark' | 'light';

const getInitialTheme = (): Theme => {
    if (window) {
        const saved = localStorage.getItem('theme');
        return saved === 'light' ? 'light' : 'dark';
    }
    return 'dark';
};

export const theme = writable<Theme>(getInitialTheme());

if (window) {
    const applyTheme = (value: Theme) => {
        if (value === 'light') {
            document.documentElement.classList.add('light');
            document.documentElement.classList.remove('dark');
            document.body.classList.add('light');
            document.body.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
            document.documentElement.classList.remove('light');
            document.body.classList.add('dark');
            document.body.classList.remove('light');
        }
    };

    theme.subscribe((value) => {
        localStorage.setItem('theme', value);
        applyTheme(value);
    });
}

export const toggleTheme = () => {
    theme.update((current) => (current === 'dark' ? 'light' : 'dark'));
};
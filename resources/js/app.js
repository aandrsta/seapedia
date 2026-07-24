import './bootstrap';

import Alpine from 'alpinejs';

Alpine.store('toast', {
    messages: [],
    add(message, type = 'error', duration = 6000) {
        const id = Date.now() + Math.random();
        this.messages.push({ id, message, type });
        setTimeout(() => this.remove(id), duration);
    },
    remove(id) {
        this.messages = this.messages.filter(m => m.id !== id);
    }
});

window.Alpine = Alpine;
Alpine.start();


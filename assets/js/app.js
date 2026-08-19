(() => {
    'use strict';

    const body = document.body;
    const menuButton = document.querySelector('[data-menu-toggle]');
    const menu = document.querySelector('[data-menu]');
    const dropdown = document.querySelector('.nav-dropdown');
    const dropdownButton = document.querySelector('[data-dropdown-toggle]');

    const closeMenu = () => {
        if (!menuButton || !menu) return;
        menuButton.setAttribute('aria-expanded', 'false');
        menu.classList.remove('open');
        body.classList.remove('menu-open');
    };

    menuButton?.addEventListener('click', () => {
        const opening = menuButton.getAttribute('aria-expanded') !== 'true';
        menuButton.setAttribute('aria-expanded', String(opening));
        menu?.classList.toggle('open', opening);
        body.classList.toggle('menu-open', opening);
    });

    dropdownButton?.addEventListener('click', () => {
        const opening = dropdownButton.getAttribute('aria-expanded') !== 'true';
        dropdownButton.setAttribute('aria-expanded', String(opening));
        dropdown?.classList.toggle('open', opening);
    });

    menu?.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') return;
        closeMenu();
        dropdown?.classList.remove('open');
        dropdownButton?.setAttribute('aria-expanded', 'false');
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 980) closeMenu();
    });

    const packageTabs = [...document.querySelectorAll('[data-package-tab]')];
    const packagePanels = [...document.querySelectorAll('[data-package-panel]')];
    packageTabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            const selected = tab.dataset.packageTab;
            packageTabs.forEach((candidate) => candidate.setAttribute('aria-selected', String(candidate === tab)));
            packagePanels.forEach((panel) => {
                panel.hidden = panel.dataset.packagePanel !== selected;
            });
            tab.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        });
    });

    const reveals = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, instance) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                instance.unobserve(entry.target);
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
        reveals.forEach((item) => observer.observe(item));
    } else {
        reveals.forEach((item) => item.classList.add('is-visible'));
    }
})();

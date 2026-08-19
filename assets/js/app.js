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

    const supportedCurrencies = ['IDR', 'USD', 'EGP'];
    const currencyButtons = [...document.querySelectorAll('[data-currency]')];
    const currencyPrices = [...document.querySelectorAll('[data-currency-price]')];
    const currencyStatuses = [...document.querySelectorAll('[data-currency-status]')];

    const detectCurrency = () => {
        const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone || '';
        const languages = navigator.languages || [navigator.language || ''];
        const languageTags = languages.map((language) => language.toLowerCase());
        const isIndonesia = /asia\/(jakarta|pontianak|makassar|jayapura)/i.test(timeZone)
            || languageTags.some((language) => language === 'id' || language.startsWith('id-'));
        const isEgypt = /africa\/cairo/i.test(timeZone)
            || languageTags.some((language) => language === 'ar-eg' || language.endsWith('-eg'));

        if (isIndonesia) return 'IDR';
        if (isEgypt) return 'EGP';
        return 'USD';
    };

    const readSavedCurrency = () => {
        try {
            const saved = window.localStorage.getItem('smartGlobalCurrency');
            return supportedCurrencies.includes(saved) ? saved : null;
        } catch (_) {
            return null;
        }
    };

    const saveCurrency = (currency) => {
        try {
            window.localStorage.setItem('smartGlobalCurrency', currency);
        } catch (_) {
            // Currency switching still works when browser storage is unavailable.
        }
    };

    const applyCurrency = (currency, source = 'automatic') => {
        if (!supportedCurrencies.includes(currency)) return;
        document.documentElement.dataset.currency = currency;

        currencyPrices.forEach((price) => {
            const amount = price.dataset[currency.toLowerCase()];
            const code = price.querySelector('[data-currency-code]');
            const value = price.querySelector('[data-currency-amount]');
            if (code) code.textContent = currency;
            if (value && amount) value.textContent = amount;
        });

        currencyButtons.forEach((button) => {
            button.setAttribute('aria-pressed', String(button.dataset.currency === currency));
        });

        currencyStatuses.forEach((status) => {
            status.textContent = source === 'automatic'
                ? `Automatically selected ${currency} for your region`
                : `${currency} selected and saved for future visits`;
        });
    };

    if (currencyButtons.length || currencyPrices.length) {
        const savedCurrency = readSavedCurrency();
        applyCurrency(savedCurrency || detectCurrency(), savedCurrency ? 'saved' : 'automatic');
        currencyButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const currency = button.dataset.currency;
                saveCurrency(currency);
                applyCurrency(currency, 'manual');
            });
        });
    }

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

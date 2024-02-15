import { registerPlugin } from '@wordpress/plugins';
import { render } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import { Button } from '@wordpress/components';

function patternLibrary() {
    const renderButton = (selector) => {
        const patternButton = document.createElement('div');
        patternButton.classList.add('blockable-pattern-library');
        selector.appendChild(patternButton);
        render()
    }


}

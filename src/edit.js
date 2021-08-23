import {__} from '@wordpress/i18n';
import {useBlockProps, RichText} from '@wordpress/block-editor';
import './editor.scss';
import apiFetch from '@wordpress/api-fetch';
import {useEffect} from '@wordpress/element';


export default function Edit({attributes, setAttributes}) {

	function handleChange(val) {
		setAttributes({num_posts: val})
	}

	return (
		<p {...useBlockProps()}>
			{__('Recent Posts')} <br/>
			{__('Number of posts: ')}
			<RichText placeholder="Number of post to show"
					  value={attributes.num_posts}
					  onChange={handleChange}
					  className="d-inline-block"
			/>
		</p>
	);
}

import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save({ attributes }) {
    const { animationType = 'fade-up' } = attributes;

    return (
        <div {...useBlockProps.save()} data-aos={animationType}>
            <InnerBlocks.Content />
        </div>
    );
}

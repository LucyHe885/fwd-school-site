import { __ } from '@wordpress/i18n'; 
import { useBlockProps, InspectorControls, PanelBody, SelectControl, InnerBlocks } from '@wordpress/block-editor';

const Edit = ({ attributes, setAttributes }) => {
    const { animationType = 'fade-up' } = attributes;
	
    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Animation Settings', 'fwd-blocks')}>
                    <SelectControl
                        label={__('Animation Type', 'fwd-blocks')}
                        value={animationType}
                        options={[
                            { label: __('Fade Up', 'fwd-blocks'), value: 'fade-up' },
                            { label: __('Fade Down', 'fwd-blocks'), value: 'fade-down' },
                            { label: __('Fade Left', 'fwd-blocks'), value: 'fade-left' },
                            { label: __('Fade Right', 'fwd-blocks'), value: 'fade-right' },
                        ]}
                        onChange={(value) => setAttributes({ animationType: value })}
                    />
                </PanelBody>
            </InspectorControls>

            <div {...useBlockProps()} data-aos={animationType}>
                <InnerBlocks />
            </div>
        </>
    );
};

export default Edit;

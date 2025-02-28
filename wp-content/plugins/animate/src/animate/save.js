import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

const Save = ({ attributes }) => {
    return (
        <div
            {...useBlockProps.save()}
            data-aos={attributes.animationType} // 确保 data-aos 正确赋值
        >
            <InnerBlocks.Content />
        </div>
    );
};

export default Save;

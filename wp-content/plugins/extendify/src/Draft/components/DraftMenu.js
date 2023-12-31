import { MenuGroup, MenuItem } from '@wordpress/components'
import { __ } from '@wordpress/i18n'
import { Icon } from '@wordpress/icons'
import { pencil } from '@draft/svg'

export const DraftMenu = ({ disabled, setInputText, setReady }) => {
    const handleClick = (inputText) => {
        setInputText(inputText)
        setReady(false)
    }

    return (
        <MenuGroup>
            <MenuItem
                disabled={disabled}
                onClick={() =>
                    handleClick(
                        __('Write a blog post about', 'extendify') + ' ',
                    )
                }
                className="group">
                <Icon
                    icon={pencil}
                    className="group-hover:text-current text-design-main fill-current w-5 h-5 mr-2"
                />
                {__('Blog post…', 'extendify')}
            </MenuItem>
            <MenuItem
                disabled={disabled}
                onClick={() =>
                    handleClick(__('Write an outline for', 'extendify') + ' ')
                }
                className="group">
                <Icon
                    icon={pencil}
                    className="group-hover:text-current text-design-main fill-current w-5 h-5 mr-2"
                />
                {__('Outline…', 'extendify')}
            </MenuItem>
            <MenuItem
                disabled={disabled}
                onClick={() =>
                    handleClick(__('Write a poem about', 'extendify') + ' ')
                }
                className="group">
                <Icon
                    icon={pencil}
                    className="group-hover:text-current text-design-main fill-current w-5 h-5 mr-2"
                />
                {__('Poem…', 'extendify')}
            </MenuItem>
            <MenuItem
                disabled={disabled}
                onClick={() =>
                    handleClick(
                        __('Write a press release for', 'extendify') + ' ',
                    )
                }
                className="group">
                <Icon
                    icon={pencil}
                    className="group-hover:text-current text-design-main fill-current w-5 h-5 mr-2"
                />
                {__('Press release…', 'extendify')}
            </MenuItem>
            <MenuItem
                disabled={disabled}
                onClick={() =>
                    handleClick(
                        __('Write a pros and cons list for', 'extendify') + ' ',
                    )
                }
                className="group">
                <Icon
                    icon={pencil}
                    className="group-hover:text-current text-design-main fill-current w-5 h-5 mr-2"
                />
                {__('Pros and cons list…', 'extendify')}
            </MenuItem>
            <MenuItem
                disabled={disabled}
                onClick={() =>
                    handleClick(
                        __('Write a job description for', 'extendify') + ' ',
                    )
                }
                className="group">
                <Icon
                    icon={pencil}
                    className="group-hover:text-current text-design-main fill-current w-5 h-5 mr-2"
                />
                {__('Job description…', 'extendify')}
            </MenuItem>
        </MenuGroup>
    )
}

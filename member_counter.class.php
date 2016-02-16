<?php
class member_counter extends WidgetHandler
{
    /**
     * @brief Widget execution
     * Get extra_vars declared in ./widgets/widget/conf/info.xml as arguments
     * After generating the result, do not print but return it.
     */
    public function proc($args)
    {
        $skin = ($args->skin) ? $args->skin : 'default';
        $tpl_path = sprintf('%sskins/%s', $this->widget_path, $skin);
        Context::set('member_total', $this->getTotalMemberCount());

        $oTemplate = &TemplateHandler::getInstance();
        return $oTemplate->compile($tpl_path, 'index');
    }

    /**
     * get total member count
     * @return int
     */
    protected function getTotalMemberCount() {
        $output = executeQuery("admin.getMemberCount");
        return $output->data->count;
    }
}
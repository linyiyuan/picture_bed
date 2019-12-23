<?php
namespace App\Http\Utils;

/**
 * Class PhoneRecharge
 * @package App\Http\Utils
 * @Author YiYuan-LIn
 * @Date: 2019/7/8
 * 导出CSV工具类
 */
class ExportExcel
{
    /**
     * @Author YiYuan-LIn
     * @Date: 2019/7/18
     * @enumeration:
     * @param $list [数据列表]
     * @param $fieldName [表头名]
     * @param $fields [字段]
     * @param $tableName [表名]
     * @return string
     * @throws \Exception
     * @description 导出CSV
     */
    public static function exportExcel($list, $fieldName, $fields, $tableName)
    {
        if (empty($list)) throw new \Exception('导出数据为空', 400);

        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename='. $tableName . '.csv');
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');

        foreach ($fieldName as $field) {
            echo '"', mb_convert_encoding($field,'gbk','utf-8'), '",';
        }
        echo "\n";

        foreach ($list as $key) {
            foreach ($fields as $k => $v) {
                echo '"', mb_convert_encoding($key->$v,'gbk','utf-8'), '",';
            }
            echo "\n";
        }

        exit;
    }
}
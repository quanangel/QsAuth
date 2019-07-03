<?php
/**
 * @Author : Qs
 * @Name   : API简易AUTH控制器
 * @Note   : 
 * @Time   : 2019/07/02 16:38
 **/
namespace Qs\auth;
use think\Db;

Class AuthApi{
    protected $_config = array(
        'AUTH_ON'           => true, // 认证开关
        'AUTH_TYPE'         => 1, // 认证方式，1为实时认证；
        'AUTH_GROUP'        => 'now_auth_group', // 用户组数据表名
        'AUTH_GROUP_ACCESS' => 'now_auth_group_access', // 用户-用户组关系表
        'AUTH_RULE'         => 'now_auth_rule', // 权限规则表
        'AUTH_USER'         => 'now_users', // 用户信息表
    );

    /**
     * @Author : Qs
     * @Name   : 验证权限
     * @Note   : 
     * @Time   : 2019/07/02 17:24
     * @param    String            $mcf       模型/控制器/方法
     * @param    String            $method    请求的method
     * @param    String|Integer    $uid       用户ID
     * @return   Boolean
     **/
    public function check($mcf, $method, $uid){
        if (!$this->_config['AUTH_ON']) return true;

        $authList = $this->getAuthList($uid); //获取用户需要验证的所有有效规则列表
        if ( is_string($mcf) ) $mcf = strtolower($mcf);
        $list = array(); //保存验证通过的规则名
        foreach ($authList as $rule) {
            if ( $mcf == $rule['name'] && $method == $rule['method']) return true;
        }
        return false;
    }

    /*
     * Auth:Qs
     * Name:根据用户id获取用户组,返回值为数组
     * Note:
     * @param  uid int     用户id
     * @return array       用户所属的用户组 array(
     * 
     * Time:2017/7/19 11:07
     */
    /**
     * @Author : Qs
     * @Name   : 根据用户ID获取用户组信息
     * @Note   : 
     * @Time   : 2019/07/02 17:27
     * @param    String|Integer    $uid    用户ID
     * @return   Array             array('uid'=>'用户id','group_id'=>'用户组id','title'=>'用户组名称','rules'=>'用户组拥有的规则id,多个,号隔开'), ...)
     * 
     **/
    public function getGroups($uid){
        $groups = array();
        $result = Db::table($this->_config['AUTH_GROUP_ACCESS'])
            ->alias('a')
            ->where('user_id',$uid)
            ->join($this->_config['AUTH_GROUP'].' b','b.id=a.group_id and b.status=1')
            ->select();
        $groups[$uid] = $result ?: array();

        return $groups[$uid];
    }
    
    /**
     * @Author : Qs
     * @Name   : 获取用户的权限列表
     * @Note   : 
     * @Time   : 2019/07/02 17:28
     * @param    String|Integer    $uid    用户ID
     * @return   Array
     **/
    protected function getAuthList($uid) {

        //读取用户所属用户组
        $groups = $this->getGroups($uid);
        //保存用户所属用户组设置的所有权限规则id
        $ids=array();
        foreach ($groups as $g) {
            $ids=array_merge($ids, explode(',', trim($g['rules'], ',')));
        }
        $ids = array_unique($ids);
        if (empty($ids)) return array();

        $where = [
            ['id', 'in', $ids],
            ['status', '=', 1]
        ];

        //读取用户组所有权限规则
        $rules=Db::table($this->_config['AUTH_RULE'])->where($where)->field('name,method')->select();

        //循环规则，判断结果。
        $authList = [];
        foreach ($rules as $rule) {
            //只要存在就记录
            $authList[] = ['name'=>strtolower($rule['name']), 'method'=>strtolower($rule['method'])];
        }

        return ($authList);
    }

}
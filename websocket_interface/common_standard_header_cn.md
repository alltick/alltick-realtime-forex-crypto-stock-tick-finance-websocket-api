> [English](./common_standard_header.md) | [中文](./common_standard_header_cn.md)

# 请求通用标准头介绍

| 字段   | 名称   | 类型   | 必填项                 | 说明                                            |
| ------ | ------ | ------ | ---------------------- | ----------------------------------------------- |
| cmd_id | 协议号 | uint32 | 详见各个接口定义有提供 |                                                 |
| seq_id | 序列号 | uint32 | 是                     | 请求者生成唯一，响应与请求将保持一致            |
| trace  | 跟踪号 | string | 是                     | 请求者生成唯一，响应与请求将保持一致,最大长度64 |
| data   | 数据体 | object | 是                     | 具体数据格式见各个接口定义                      |
```json
{
    "cmd_id":22000,
    "seq_id":123,
    "trace":"asdfsdfa",
    "data":{
    }
}
```

# 应答通用标准头介绍

| 字段   | 名称   | 类型   | 说明                                            |
| ------ | ------ | ------ | ----------------------------------------------- |
| ret    | 返回值 | int32  | [错误码说明](../error_code_description_cn.md)   |
| msg    | 消息   | string | 对成功或者失败具体的描述                        |
| cmd_id | 协议号 | uint32 | 详见各个接口定义有提供                          |
| seq_id | 序列号 | uint32 | 请求者生成唯一，响应与请求将保持一致            |
| trace  | 跟踪号 | string | 请求者生成唯一，响应与请求将保持一致,最大长度64 |
| data   | 数据体 | object | 具体数据格式见各个接口定义                      |
```json
{
    "ret":201,
    "msg":"request header param invalid",
    "cmd_id":0,
    "seq_id":0,
    "trace":"",
    "data":{
    }    
}
```
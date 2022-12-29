import{r as u,u as b,o as s,d as c,b as o,f as t,w as m,F as a,H as x,a as i,l as y,n as C,h as n,D as w}from"./app.a8813d1c.js";import{J as V}from"./AuthenticationCard.f8f0ecfa.js";import{_ as $}from"./AuthenticationCardLogo.21f46814.js";import{_ as F}from"./Button.fec846ba.js";import{_ as p}from"./Input.16f1d27c.js";import{_ as v}from"./InputError.9e821b96.js";import{_ as g}from"./Label.2d2ef3db.js";import"./_plugin-vue_export-helper.cdc0426e.js";import"./matice.737db02d.js";const I={class:"mb-4 text-sm text-gray-600"},T=n(" Please confirm access to your account by entering the authentication code provided by your authenticator application. "),U=n(" Please confirm access to your account by entering one of your emergency recovery codes. "),B=["onSubmit"],N={key:0},H={key:1},J={class:"flex items-center justify-end mt-4"},P=["onClick"],R=n(" Use a recovery code "),S=n(" Use an authentication code "),j=n(" Log in "),W={__name:"TwoFactorChallenge",setup(z){const r=u(!1),e=b({code:"",recovery_code:""}),_=u(null),f=u(null),h=async()=>{r.value^=!0,await w(),r.value?(_.value.focus(),e.code=""):(f.value.focus(),e.recovery_code="")},k=()=>{e.post(route("two-factor.login"))};return(A,l)=>(s(),c(a,null,[o(t(x),{title:"Two-factor Confirmation"}),o(V,null,{logo:m(()=>[o($)]),default:m(()=>[i("div",I,[r.value?(s(),c(a,{key:1},[U],64)):(s(),c(a,{key:0},[T],64))]),i("form",{onSubmit:y(k,["prevent"])},[r.value?(s(),c("div",H,[o(g,{for:"recovery_code",value:"Recovery Code"}),o(p,{id:"recovery_code",ref_key:"recoveryCodeInput",ref:_,modelValue:t(e).recovery_code,"onUpdate:modelValue":l[1]||(l[1]=d=>t(e).recovery_code=d),type:"text",class:"mt-1 block w-full",autocomplete:"one-time-code"},null,8,["modelValue"]),o(v,{class:"mt-2",message:t(e).errors.recovery_code},null,8,["message"])])):(s(),c("div",N,[o(g,{for:"code",value:"Code"}),o(p,{id:"code",ref_key:"codeInput",ref:f,modelValue:t(e).code,"onUpdate:modelValue":l[0]||(l[0]=d=>t(e).code=d),type:"text",inputmode:"numeric",class:"mt-1 block w-full",autofocus:"",autocomplete:"one-time-code"},null,8,["modelValue"]),o(v,{class:"mt-2",message:t(e).errors.code},null,8,["message"])])),i("div",J,[i("button",{type:"button",class:"text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer",onClick:y(h,["prevent"])},[r.value?(s(),c(a,{key:1},[S],64)):(s(),c(a,{key:0},[R],64))],8,P),o(F,{class:C(["ml-4",{"opacity-25":t(e).processing}]),disabled:t(e).processing},{default:m(()=>[j]),_:1},8,["class","disabled"])])],40,B)]),_:1})],64))}};export{W as default};
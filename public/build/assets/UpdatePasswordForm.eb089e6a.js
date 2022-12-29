import{r as f,u as V,o as v,c as g,w as e,h as l,t as n,f as r,a as p,b as o,n as P}from"./app.9995b85c.js";import{_ as b}from"./ActionMessage.d5af3d18.js";import{_ as y}from"./Button.8b66cec4.js";import{_ as k}from"./FormSection.34ce0bd1.js";import{_ as d}from"./Input.c49b17a8.js";import{_ as c}from"./InputError.6effe78a.js";import{_ as m}from"./Label.95def234.js";import{m as u}from"./matice.dff5312f.js";import"./SectionTitle.1fb5c938.js";import"./_plugin-vue_export-helper.cdc0426e.js";const S={class:"col-span-6 sm:col-span-4"},$={class:"col-span-6 sm:col-span-4"},U={class:"col-span-6 sm:col-span-4"},x=l(" Saved. "),A={__name:"UpdatePasswordForm",setup(B){const i=f(null),_=f(null),s=V({current_password:"",password:"",password_confirmation:""}),w=()=>{s.put(route("user-password.update"),{errorBag:"updatePassword",preserveScroll:!0,onSuccess:()=>s.reset(),onError:()=>{s.errors.password&&(s.reset("password","password_confirmation"),i.value.focus()),s.errors.current_password&&(s.reset("current_password"),_.value.focus())}})};return(C,a)=>(v(),g(k,{onSubmitted:w},{title:e(()=>[l(n(r(u.trans)("profile.Update_Password")),1)]),description:e(()=>[l(n(r(u.trans)("profile.Ensure_secure_password"))+". ",1)]),form:e(()=>[p("div",S,[o(m,{for:"current_password",value:"profile.Current_Password"}),o(d,{id:"current_password",ref_key:"currentPasswordInput",ref:_,modelValue:r(s).current_password,"onUpdate:modelValue":a[0]||(a[0]=t=>r(s).current_password=t),type:"password",class:"mt-1 block w-full",autocomplete:"current-password"},null,8,["modelValue"]),o(c,{message:r(s).errors.current_password,class:"mt-2"},null,8,["message"])]),p("div",$,[o(m,{for:"password",value:"profile.New_Password"}),o(d,{id:"password",ref_key:"passwordInput",ref:i,modelValue:r(s).password,"onUpdate:modelValue":a[1]||(a[1]=t=>r(s).password=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),o(c,{message:r(s).errors.password,class:"mt-2"},null,8,["message"])]),p("div",U,[o(m,{for:"password_confirmation",value:"profile.Confirm_Password"}),o(d,{id:"password_confirmation",modelValue:r(s).password_confirmation,"onUpdate:modelValue":a[2]||(a[2]=t=>r(s).password_confirmation=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),o(c,{message:r(s).errors.password_confirmation,class:"mt-2"},null,8,["message"])])]),actions:e(()=>[o(b,{on:r(s).recentlySuccessful,class:"mr-3"},{default:e(()=>[x]),_:1},8,["on"]),o(y,{class:P({"opacity-25":r(s).processing}),disabled:r(s).processing},{default:e(()=>[l(n(r(u.trans)("btn.Save")),1)]),_:1},8,["class","disabled"])]),_:1}))}};export{A as default};

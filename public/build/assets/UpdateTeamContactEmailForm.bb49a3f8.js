import{u as _,o as d,c as f,N as u,w as t,b as s,h as o,t as m,f as a,n as b,a as C}from"./app.9995b85c.js";import{_ as S}from"./ActionMessage.d5af3d18.js";import{_ as g}from"./Button.8b66cec4.js";import{_ as T}from"./FormSection.34ce0bd1.js";import{_ as V}from"./Input.c49b17a8.js";import{_ as $}from"./InputError.6effe78a.js";import{_ as v}from"./Label.95def234.js";import{m as n}from"./matice.dff5312f.js";import"./SectionTitle.1fb5c938.js";import"./_plugin-vue_export-helper.cdc0426e.js";const x={class:"col-span-6 sm:col-span-4"},z={__name:"UpdateTeamContactEmailForm",props:{team:Object,permissions:Object},setup(c){const r=c,e=_({contact_email:r.team.contact_email}),l=()=>{e.put(route("teams.update_contact_email",r.team),{errorBag:"updateTeamContactEmail",preserveScroll:!0})};return(N,i)=>(d(),f(T,{onSubmitted:l},u({title:t(()=>[o(m(a(n.trans)("team.Contact_email")),1)]),description:t(()=>[o(m(a(n.trans)("team.Contact_email_description"))+". ",1)]),form:t(()=>[C("div",x,[s(v,{for:"name",value:"team.Contact_email"}),s(V,{id:"name",modelValue:a(e).contact_email,"onUpdate:modelValue":i[0]||(i[0]=p=>a(e).contact_email=p),type:"text",class:"mt-1 block w-full",disabled:!c.permissions.canUpdateTeam},null,8,["modelValue","disabled"]),s($,{message:a(e).errors.contact_email,class:"mt-2"},null,8,["message"])])]),_:2},[c.permissions.canUpdateTeam?{name:"actions",fn:t(()=>[s(S,{on:a(e).recentlySuccessful,class:"mr-3"},{default:t(()=>[o(m(a(n.trans)("app.Saved"))+". ",1)]),_:1},8,["on"]),s(g,{class:b({"opacity-25":a(e).processing}),disabled:a(e).processing},{default:t(()=>[o(m(a(n.trans)("btn.Save")),1)]),_:1},8,["class","disabled"])])}:void 0]),1024))}};export{z as default};
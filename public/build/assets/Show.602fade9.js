import{_ as i}from"./AppLayout.59ac6542.js";import o from"./DeleteTeamForm.a9eab914.js";import{J as r}from"./SectionBorder.f08e0246.js";import n from"./TeamMemberManager.c9187e4c.js";import l from"./UpdateTeamContactEmailForm.bb49a3f8.js";import c from"./UpdateTeamNameForm.ebfeff39.js";import{m as p}from"./matice.dff5312f.js";import{o as a,c as f,w as s,a as m,t as u,f as d,b as t,d as x,F as b,e as g}from"./app.9995b85c.js";import"./_plugin-vue_export-helper.cdc0426e.js";import"./ActionSection.1cf3c8b4.js";import"./SectionTitle.1fb5c938.js";import"./ConfirmationModal.1f6092bc.js";import"./Modal.93a9b59f.js";import"./DangerButton.561b78f9.js";import"./SecondaryButton.f279d83e.js";import"./ActionMessage.d5af3d18.js";import"./Button.8b66cec4.js";import"./DialogModal.4a3cd242.js";import"./FormSection.34ce0bd1.js";import"./Input.c49b17a8.js";import"./InputError.6effe78a.js";import"./Label.95def234.js";const h={class:"font-semibold text-xl text-gray-800 leading-tight"},v={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},K={__name:"Show",props:{team:Object,availableRoles:Array,permissions:Object},setup(e){return(_,y)=>(a(),f(i,{title:"Team Settings"},{header:s(()=>[m("h2",h,u(d(p.trans)("team.Team_Settings")),1)]),default:s(()=>[m("div",null,[m("div",v,[t(c,{team:e.team,permissions:e.permissions},null,8,["team","permissions"]),t(l,{team:e.team,permissions:e.permissions},null,8,["team","permissions"]),t(n,{class:"mt-10 sm:mt-0",team:e.team,"available-roles":e.availableRoles,"user-permissions":e.permissions},null,8,["team","available-roles","user-permissions"]),e.permissions.canDeleteTeam&&!e.team.personal_team?(a(),x(b,{key:0},[t(r),t(o,{class:"mt-10 sm:mt-0",team:e.team},null,8,["team"])],64)):g("",!0)])])]),_:1}))}};export{K as default};

<?php namespace spec\Felixkiss\UniqueWithValidator;

use PhpSpec\ObjectBehavior;

class RuleParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Felixkiss\UniqueWithValidator\RuleParser');
    }

    function it_can_parse_the_table_name_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'last_name'], []);
        $this->getTable()->shouldReturn('users');
    }

    function it_can_parse_the_primary_field_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'last_name'], []);
        $this->getPrimaryField()->shouldReturn('first_name');
    }

    function it_can_parse_the_primary_value_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'last_name'], []);
        $this->getPrimaryValue()->shouldReturn('Foo');
    }

    function it_can_parse_one_additional_field_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'last_name'], ['last_name' => 'Bar']);
        $this->getAdditionalFields()->shouldReturn(['last_name' => 'Bar']);
    }

    function it_can_parse_two_additional_fields_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'middle_name', 'last_name'], ['middle_name' => 'Quux', 'last_name' => 'Bar']);
        $this->getAdditionalFields()->shouldReturn(['middle_name' => 'Quux', 'last_name' => 'Bar']);
    }

    function it_can_parse_custom_name_for_primary_field_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'first_name = firstName', 'last_name'], ['last_name' => 'Bar']);
        $this->getPrimaryField()->shouldReturn('firstName');
    }

    function it_can_parse_custom_name_for_additional_field_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'last_name = sur_name'], ['last_name' => 'Bar']);
        $this->getAdditionalFields()->shouldReturn(['sur_name' => 'Bar']);
    }

    function it_has_no_ignore_value_by_default()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'last_name'], []);
        $this->getIgnoreValue()->shouldReturn(null);
    }

    function it_has_no_ignore_column_by_default()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'last_name'], []);
        $this->getIgnoreColumn()->shouldReturn(null);
    }

    function it_can_parse_implicit_integer_ignore_value_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'last_name', '1'], []);
        $this->getIgnoreValue()->shouldReturn('1');
    }

    function it_can_parse_implicit_integer_ignore_column_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'last_name', '1 = user_id'], []);
        $this->getIgnoreColumn()->shouldReturn('user_id');
    }

    function it_can_parse_explicit_ignore_value_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'last_name', 'ignore:abc123'], []);
        $this->getIgnoreValue()->shouldReturn('abc123');
    }

    function it_can_parse_explicit_ignore_column_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'last_name', 'ignore:abc123 = user_id'], []);
        $this->getIgnoreColumn()->shouldReturn('user_id');
    }

    function it_returns_data_fields_correctly()
    {
        $this->beConstructedWith('first_name', 'Foo', ['users', 'first_name = firstName', 'middle_name', 'last_name => lastName', 'ignore:abc123 = user_id'], []);
        $this->getDataFields()->shouldReturn(['first_name', 'middle_name', 'last_name']);
    }
}
